<?php

namespace sbtsdev\LaravelClickupErrorReports;

use Mail;

class LaravelClickupErrorReports
{

    private $listId;
    private $clickupKey;
    private $assigneeId;
    private $backupEmail;

    public function __construct()
    {
        $this->listId = config('laravelclickuperrorreports.list_id');
        $this->clickupKey = config('laravelclickuperrorreports.personal_api_key');
        $this->assigneeId = config('laravelclickuperrorreports.assignee_id');
        $this->backupEmail = config('laravelclickuperrorreports.backup_email');
    }

    public function createTask(string $name, string $content) : void
    {
        $ch = curl_init();

        $this->listId = '';
        curl_setopt($ch, CURLOPT_URL, "https://api.clickup.com/api/v1/list/$this->listId/task");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        $post_fields = [
            "name" => $name,
            "content" => $content,
            "assignees" => [
                $this->assigneeId
            ],
            "status" => "Open"
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_fields));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: ".$this->clickupKey,
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //check that id of new task is returned
        $data = json_decode($response);

        if (!($response->id ?? '')) {
            $this->sendErrorEmail("Failed to created task in clickup", print_r($post_fields, true));
        }
    }

    public function createTaskFromException(\Exception $e, string $title = 'Error encountered', string $extra = '') : void
    {
        $message = "On or about ".date("m/d/Y H:i:s").", the following exception was thrown:\n\n";
        $message.= "File: ".$e->getFile()."\r\n\r\nLine: ".$e->getLine()."\r\n\r\nError code: ".$e->getCode()."\r\n\r\n";
        $message.= $extra;
        $message.= "Message:\r\n\r\n".$e->getMessage()."\r\n\r\n";
        $message.= "Stack trace:\r\n\r\n".$e->getTraceAsString();
        $message.= "\r\nEverything:\r\n\r\n".$e;
        $this->createTask($title, substr($message, 0, 65530));
    }

    private function sendErrorEmail(string $subject, string $details) : void
    {
        Mail::raw($details, function ($email) use ($subject) {
            $email->subject($subject)->to($this->backupEmail);
        });
    }
}
