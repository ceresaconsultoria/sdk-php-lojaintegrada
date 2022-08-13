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
 * Description of Webhook
 *
 * @author weslley
 */
class Categoria extends LIController{
    public function subconjunto(array $ids, array $query = []){
        try{
            $response = $this->http->get("categoria/set/" . implode(";", $ids), array(
                "headers" => [
                    "Authorization" => sprintf("chave_api %s aplicacao %s", $this->getApiKey(), $this->getAppKey())
                ],
                "query" => $query
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 500, $ex->getPrevious());
                
            }
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new LIException($ex);
        
        }
        
    }
    
    public function alterar($id, array $payload, array $query = []){
        try{
            $response = $this->http->put("categoria/".$id, array(
                "headers" => [
                    "Authorization" => sprintf("chave_api %s aplicacao %s", $this->getApiKey(), $this->getAppKey()),
                ],
                "json" => $payload,
                "query" => $query,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 500, $ex->getPrevious());
                
            }
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new LIException($ex);
        
        }
        
    }
    
    public function detalhes($id, array $query = []){
        try{
            $response = $this->http->get("categoria/".$id, array(
                "headers" => [
                    "Authorization" => sprintf("chave_api %s aplicacao %s", $this->getApiKey(), $this->getAppKey()),
                ],
                "query" => $query,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 500, $ex->getPrevious());
                
            }
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new LIException($ex);
        
        }
        
    }
    
    public function cadastrar(array $payload){
        try{
            $response = $this->http->post("categoria", array(
                "headers" => [
                    "Authorization" => sprintf("chave_api %s aplicacao %s", $this->getApiKey(), $this->getAppKey())
                ],
                "json" => $payload
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 500, $ex->getPrevious());
                
            }
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new LIException($ex);
        
        }
        
    }
    
    public function listarTodas(array $query = []){
        try{
            $response = $this->http->get("categoria", array(
                "headers" => [
                    "Authorization" => sprintf("chave_api %s aplicacao %s", $this->getApiKey(), $this->getAppKey())
                ],
                "query" => $query
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 500, $ex->getPrevious());
                
            }
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->error_response)){
                
                throw LIException::fromObjectMessage($bodyDecoded->error_response, 400, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new LIException($ex);
        
        }
        
    }
}
