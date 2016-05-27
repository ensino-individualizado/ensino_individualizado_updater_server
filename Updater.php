<?php

use \Jacwright\RestServer\RestException;

class Updater
{
    public $USER_NAME = "gustavofamorim";
    public $MANAGER_REPOSITORY = "ensino_individualizado_manager";
    public $STUDENT_REPOSITORY = "ensino_individualizado_student";
    
    public function get($url, $encode_type){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User-Agent: gustavofamorim_server',
            'Accept: application/json'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        return (json_decode($response, $encode_type));
    }
    
    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /lastManagerVersionName
     */
    public function lastManagerVersioName()
    {
        $url = 'https://api.github.com/repos/'.$this->USER_NAME.'/'.$this->MANAGER_REPOSITORY.'/releases/latest';
        return ($this->get($url, true)["tag_name"]);
    }

    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /lastStudentVersionName
     */
    public function lastStudentVersionName()
    {
        $url = 'https://api.github.com/repos/'.$this->USER_NAME.'/'.$this->STUDENT_REPOSITORY.'/releases/latest';
        return ($this->get($url, true)["tag_name"]);
    }
    
    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /lastManagerVersion
     */
    public function lastManagerVersionURL()
    {
        $url = 'https://api.github.com/repos/'.$this->USER_NAME.'/'.$this->MANAGER_REPOSITORY.'/releases/latest';
        $response = $this->get($url, true);
        return ($this->get($response["assets"][0]["url"], true)["browser_download_url"]);
    }
    
        /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /lastStudentVersion
     */
    public function lastStudentVersionURL()
    {
        $url = 'https://api.github.com/repos/'.$this->USER_NAME.'/'.$this->STUDENT_REPOSITORY.'/releases/latest';
        $response = $this->get($url, true);
        return ($this->get($response["assets"][0]["url"], true)["browser_download_url"]);
    }
    
}