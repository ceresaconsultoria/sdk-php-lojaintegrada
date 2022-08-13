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
class SituacaoPedido extends LIController{    
    public function historicoPedido(array $query = []){
        try{
            $response = $this->http->get("situacao_historico/search", array(
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
    
    public function historico(array $query = []){
        try{
            $response = $this->http->get("situacao_historico", array(
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
    
    public function alterarPedido($pedidoId, array $payload, array $query = []){
        try{
            $response = $this->http->put("situacao/pedido/".$pedidoId, array(
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
    
    public function detalhesPedido($pedidoId, array $query = []){
        try{
            $response = $this->http->get("situacao/pedido/".$pedidoId, array(
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
    
    public function listarTodas(array $query = []){
        try{
            $response = $this->http->get("situacao", array(
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
