<?php

return [
    //get this from "Apps" under the user profile in clickup
    'personal_api_key' => env('CLICKUP_API_PK', ''),
    //NOTE: you can create some sort of clickup app to create a shared key, but
    //then you must use the OAuth2 protocol to gain a session key

    //list id pulled from clickup
    //to pull the list id use dev tools in a browser
    // and get the value of the data-category attribute from the div for a task in that task list
    'list_id'   => env('CLICKUP_LIST_ID', ''),

    //clickup Id, I pulled it from the first number in the profile image uri
    'assignee_id' => env('CLICKUP_ASSIGNEE_ID', ''),

    //if clickup rest call fails then email this address
    'backup_email' => env('CLICKUP_BACKUP_EMAIL', ''),

    //send errors even when not in production environment
    'send_errors_in_dev' => env('CLICKUP_SEND_DEV_ERRORS', false)
];
