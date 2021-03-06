<?php
/**
 * FileApi
 * PHP version 5
 *
 * @category Class
 * @package  Bytescout\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 *  Copyright 2016 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program. 
 * https://github.com/swagger-api/swagger-codegen 
 * Do not edit the class manually.
 */

namespace Bytescout\Client\Api;

use \Bytescout\Client\Configuration;
use \Bytescout\Client\ApiClient;
use \Bytescout\Client\ApiException;
use \Bytescout\Client\ObjectSerializer;

/**
 * FileApi Class Doc Comment
 *
 * @category Class
 * @package  Bytescout\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FileApi
{

    /**
     * API Client
     * @var \Bytescout\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;
  
    /**
     * Constructor
     * @param \Bytescout\Client\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://bytescout.io');
        }
  
        $this->apiClient = $apiClient;
    }
  
    /**
     * Get API client
     * @return \Bytescout\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
  
    /**
     * Set the API client
     * @param \Bytescout\Client\ApiClient $apiClient set the API client
     * @return FileApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * fileDeleteFile
     *
     * Remove file from server permanently
     *
     * @param string $fileId FileId (required)
     * @param string $apikey User&#39;s ApiKey (optional)
     * @return \Bytescout\Client\Model\Object
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileDeleteFile($fileId, $apikey = null)
    {
        list($response, $statusCode, $httpHeader) = $this->fileDeleteFileWithHttpInfo ($fileId, $apikey);
        return $response; 
    }


    /**
     * fileDeleteFileWithHttpInfo
     *
     * Remove file from server permanently
     *
     * @param string $fileId FileId (required)
     * @param string $apikey User&#39;s ApiKey (optional)
     * @return Array of \Bytescout\Client\Model\Object, HTTP status code, HTTP response headers (array of strings)
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileDeleteFileWithHttpInfo($fileId, $apikey = null)
    {
        
        // verify the required parameter 'fileId' is set
        if ($fileId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileId when calling fileDeleteFile');
        }
  
        // parse inputs
        $resourcePath = "/api/v1/file/delete/{FileId}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json', 'text/json', 'application/xml', 'text/xml'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        // query params
        
        if ($apikey !== null) {
            $queryParams['apikey'] = $this->apiClient->getSerializer()->toQueryValue($apikey);
        }
        
        // path params
        
        if ($fileId !== null) {
            $resourcePath = str_replace(
                "{" . "FileId" . "}",
                $this->apiClient->getSerializer()->toPathValue($fileId),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'DELETE',
                $queryParams, $httpBody,
                $headerParams, '\Bytescout\Client\Model\Object'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\Bytescout\Client\ObjectSerializer::deserialize($response, '\Bytescout\Client\Model\Object', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\Object', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\ExceptionResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * fileGet
     *
     * Download file
     *
     * @param string $fileId FileId (required)
     * @param string $apikey User&#39;s ApiKey (optional)
     * @param string $outputType Type in which you want to get a File (Default value: Content) (optional)
     * @return string
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileGet($fileId, $apikey = null, $outputType = null)
    {
        list($response, $statusCode, $httpHeader) = $this->fileGetWithHttpInfo ($fileId, $apikey, $outputType);
        return $response; 
    }


    /**
     * fileGetWithHttpInfo
     *
     * Download file
     *
     * @param string $fileId FileId (required)
     * @param string $apikey User&#39;s ApiKey (optional)
     * @param string $outputType Type in which you want to get a File (Default value: Content) (optional)
     * @return Array of string, HTTP status code, HTTP response headers (array of strings)
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileGetWithHttpInfo($fileId, $apikey = null, $outputType = null)
    {
        
        // verify the required parameter 'fileId' is set
        if ($fileId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileId when calling fileGet');
        }
  
        // parse inputs
        $resourcePath = "/api/v1/file/download/{FileId}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json', 'text/json', 'application/xml', 'text/xml'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        // query params
        
        if ($apikey !== null) {
            $queryParams['apikey'] = $this->apiClient->getSerializer()->toQueryValue($apikey);
        }// query params
        
        if ($outputType !== null) {
            $queryParams['OutputType'] = $this->apiClient->getSerializer()->toQueryValue($outputType);
        }
        
        // path params
        
        if ($fileId !== null) {
            $resourcePath = str_replace(
                "{" . "FileId" . "}",
                $this->apiClient->getSerializer()->toPathValue($fileId),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, 'string'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\Bytescout\Client\ObjectSerializer::deserialize($response, 'string', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), 'string', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\ExceptionResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * fileGetPublicFile
     *
     * Download public file
     *
     * @param string $publicFileId PublicFileId (required)
     * @param string $outputType Type in which you want to get a File (Default value: Content) (optional)
     * @return string
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileGetPublicFile($publicFileId, $outputType = null)
    {
        list($response, $statusCode, $httpHeader) = $this->fileGetPublicFileWithHttpInfo ($publicFileId, $outputType);
        return $response; 
    }


    /**
     * fileGetPublicFileWithHttpInfo
     *
     * Download public file
     *
     * @param string $publicFileId PublicFileId (required)
     * @param string $outputType Type in which you want to get a File (Default value: Content) (optional)
     * @return Array of string, HTTP status code, HTTP response headers (array of strings)
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileGetPublicFileWithHttpInfo($publicFileId, $outputType = null)
    {
        
        // verify the required parameter 'publicFileId' is set
        if ($publicFileId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $publicFileId when calling fileGetPublicFile');
        }
  
        // parse inputs
        $resourcePath = "/api/v1/file/download/public/{PublicFileId}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json', 'text/json', 'application/xml', 'text/xml'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        // query params
        
        if ($outputType !== null) {
            $queryParams['OutputType'] = $this->apiClient->getSerializer()->toQueryValue($outputType);
        }
        
        // path params
        
        if ($publicFileId !== null) {
            $resourcePath = str_replace(
                "{" . "PublicFileId" . "}",
                $this->apiClient->getSerializer()->toPathValue($publicFileId),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, 'string'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\Bytescout\Client\ObjectSerializer::deserialize($response, 'string', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), 'string', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\ExceptionResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * fileUploadFile
     *
     * Upload file to server to use it in conversions
     *
     * @param string $apikey User&#39;s ApiKey (optional)
     * @param \SplFileObject $file File (optional)
     * @param string $input Input Data (optional)
     * @param string $inputType Type of Input Data (optional)
     * @param int $storageTime Time of storage this file on server. Default value: 1800 (optional)
     * @return string
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileUploadFile($apikey = null, $file = null, $input = null, $inputType = null, $storageTime = null)
    {
        list($response, $statusCode, $httpHeader) = $this->fileUploadFileWithHttpInfo ($apikey, $file, $input, $inputType, $storageTime);
        return $response; 
    }


    /**
     * fileUploadFileWithHttpInfo
     *
     * Upload file to server to use it in conversions
     *
     * @param string $apikey User&#39;s ApiKey (optional)
     * @param \SplFileObject $file File (optional)
     * @param string $input Input Data (optional)
     * @param string $inputType Type of Input Data (optional)
     * @param int $storageTime Time of storage this file on server. Default value: 1800 (optional)
     * @return Array of string, HTTP status code, HTTP response headers (array of strings)
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileUploadFileWithHttpInfo($apikey = null, $file = null, $input = null, $inputType = null, $storageTime = null)
    {
        
  
        // parse inputs
        $resourcePath = "/api/v1/file/upload";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json', 'text/json', 'application/xml', 'text/xml'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json','text/json','application/octet-stream','multipart/form-data'));
  
        // query params
        
        if ($apikey !== null) {
            $queryParams['apikey'] = $this->apiClient->getSerializer()->toQueryValue($apikey);
        }
        
        
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // form params
        if ($file !== null) {
            
            // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
            // See: https://wiki.php.net/rfc/curl-file-upload
            if (function_exists('curl_file_create')) {
                $formParams['file'] = curl_file_create($this->apiClient->getSerializer()->toFormValue($file));
            } else {
               $formParams['file'] = '@' . $this->apiClient->getSerializer()->toFormValue($file);
            }
            
            
        }// form params
        if ($input !== null) {
            
            
            $formParams['input'] = $this->apiClient->getSerializer()->toFormValue($input);
            
        }// form params
        if ($inputType !== null) {
            
            
            $formParams['inputType'] = $this->apiClient->getSerializer()->toFormValue($inputType);
            
        }// form params
        if ($storageTime !== null) {
            
            
            $formParams['storageTime'] = $this->apiClient->getSerializer()->toFormValue($storageTime);
            
        }
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'POST',
                $queryParams, $httpBody,
                $headerParams, 'string'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\Bytescout\Client\ObjectSerializer::deserialize($response, 'string', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), 'string', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\ExceptionResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * fileUploadLink
     *
     * Upload file to server to use it in conversions
     *
     * @param string $apikey User&#39;s ApiKey (optional)
     * @param int $storageTime Time of storing of a file on server (seconds) (optional).\r\n            Default value: 1800 (optional)
     * @param string $outputType Type in which you want to get result of extracting (optional). Default value: Content. \r\n            IMPORTANT: \r\n            Link type generates public unique link to download, file is removed after default StorageTime(see File API). \r\n            LinkPrivate generates private unique link which should NOT be shared as it can be accessed with your api key only! (optional)
     * @param string $input Input Data (optional)
     * @param string $inputType Type of Input Data (optional)
     * @return string
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileUploadLink($apikey = null, $storageTime = null, $outputType = null, $input = null, $inputType = null)
    {
        list($response, $statusCode, $httpHeader) = $this->fileUploadLinkWithHttpInfo ($apikey, $storageTime, $outputType, $input, $inputType);
        return $response; 
    }


    /**
     * fileUploadLinkWithHttpInfo
     *
     * Upload file to server to use it in conversions
     *
     * @param string $apikey User&#39;s ApiKey (optional)
     * @param int $storageTime Time of storing of a file on server (seconds) (optional).\r\n            Default value: 1800 (optional)
     * @param string $outputType Type in which you want to get result of extracting (optional). Default value: Content. \r\n            IMPORTANT: \r\n            Link type generates public unique link to download, file is removed after default StorageTime(see File API). \r\n            LinkPrivate generates private unique link which should NOT be shared as it can be accessed with your api key only! (optional)
     * @param string $input Input Data (optional)
     * @param string $inputType Type of Input Data (optional)
     * @return Array of string, HTTP status code, HTTP response headers (array of strings)
     * @throws \Bytescout\Client\ApiException on non-2xx response
     */
    public function fileUploadLinkWithHttpInfo($apikey = null, $storageTime = null, $outputType = null, $input = null, $inputType = null)
    {
        
  
        // parse inputs
        $resourcePath = "/api/v1/file/upload";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json', 'text/json', 'application/xml', 'text/xml'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array());
  
        // query params
        
        if ($apikey !== null) {
            $queryParams['apikey'] = $this->apiClient->getSerializer()->toQueryValue($apikey);
        }// query params
        
        if ($storageTime !== null) {
            $queryParams['storageTime'] = $this->apiClient->getSerializer()->toQueryValue($storageTime);
        }// query params
        
        if ($outputType !== null) {
            $queryParams['outputType'] = $this->apiClient->getSerializer()->toQueryValue($outputType);
        }// query params
        
        if ($input !== null) {
            $queryParams['input'] = $this->apiClient->getSerializer()->toQueryValue($input);
        }// query params
        
        if ($inputType !== null) {
            $queryParams['inputType'] = $this->apiClient->getSerializer()->toQueryValue($inputType);
        }
        
        
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, 'string'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\Bytescout\Client\ObjectSerializer::deserialize($response, 'string', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), 'string', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 401:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\BadRequestModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \Bytescout\Client\ObjectSerializer::deserialize($e->getResponseBody(), '\Bytescout\Client\Model\ExceptionResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
}
