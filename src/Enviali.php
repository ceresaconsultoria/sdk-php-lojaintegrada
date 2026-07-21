<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LI;

use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use LI\Core\LIController;
use LI\Exceptions\LIException;

/**
 * Description of Enviali
 *
 * @author weslley
 */
class Enviali extends LIController{
    
    public function __construct(array $config = []) {
        $config = array_merge([
            'base_uri' => self::BASE_DOMAIN
        ]);
        
        parent::__construct($config);
    }
    
    public function cotacao(array $payload){
        try{
            $response = $this->http->post("enviali/v2/postage/estimate", array(
                "headers" => [
                    "Authorization" => sprintf("chave_api %s aplicacao %s", $this->getApiKey(), $this->getAppKey()),
                ],
                "json" => $payload,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 500, $ex->getPrevious());
                
            }
            else{
                throw LIException::fromObjectMessage($body, 500, $ex->getPrevious());    
            }
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            else{
                throw LIException::fromObjectMessage($body, 400, $ex->getPrevious());    
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            else{
                throw LIException::fromObjectMessage($body, 400, $ex->getPrevious());    
            }
            
        } catch (Exception $ex) {
                 
            throw new LIException($ex);
        
        }
        
    }
    
}
