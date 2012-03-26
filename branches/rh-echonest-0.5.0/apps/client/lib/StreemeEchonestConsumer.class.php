<?php
/**
 * An echonest API consumer for Streeme - this library requires sfWebBrowserPlugin for HTTP calls
 *
 * @author Richard Hoar
 * @package Streeme
 * @depends sfWebBrowserPlugin
 * @see http://www.symfony-project.org/plugins/sfWebBrowserPlugin
 */
class StreemeEchonestConsumer
{
  protected $format, $apiKey, $apiVersion, $http, $apiEndpoint, $uri, $responseTime;
  protected $parameters = array();
  protected $headers = array();

  /**
   * Constructor
   *
   * @param apiKey str: Echonest Api Key
   * @param http   obj: sfWebBrowser instance
   */
  public function __construct($apiKey, sfWebBrowser $http, $apiEndpoint = 'http://developer.echonest.com/api', $apiVersion = 'v4')
  {
    $this->format = 'xml';
    $this->http = $http;
    $this->apiKey = $apiKey;
    $this->apiVersion = $apiVersion;
    $this->apiEndpoint = $apiEndpoint;
  }
  
  /**
   * Call echonest and get the results for the given parameters set with setParameter
   *
   * @param api     str: the api to call (eg. artist, song, track)
   * @param service str: the api method to call (eg. search, profile)
   * @param method  str: GET|POST
   * @return        str: xml result
   */
  public function query($api, $service, $method = 'GET')
  {
    $time_start = microtime(true);
    
    $params = null;
    $files = array();
    if(is_array($this->parameters))
    {
      foreach ($this->parameters as $parameter)
      {
        if(isset($parameter['data']))
        {
          $files['data'] = $parameter['data'];
          continue;
        }
        $params .= sprintf('&%s', http_build_query($parameter));
      }
    }
  
    $this->uri = sprintf( '%s/%s/%s/%s?api_key=%s&format=%s%s', $this->apiEndpoint, $this->apiVersion, $api, $service, $this->apiKey, $this->format, $params );
    
    $this->http->call($this->uri, $method, $files, $this->headers);
   
    $this->parameters = $this->headers = array();
    
    $time_end = microtime(true);
    $this->responseTime = $time_end - $time_start;
    
    return $this;
  }
  
  /**
   * Get the raw xml response for caching/string ops
   *
   * @return         str: xml response from Echonest
   */
  public function fetchRawResult()
  {
    return $this->http->getResponseText();
  }

  /**
   * Convert the XML response to a SimpleXML object
   *
   * @return         obj: SimpleXMLElement
   */
  public function fetchResult()
  {
    return $this->http->getResponseXML();
  }
  
  /**
   * Convert the XML response to an associative array
   *
   * @return         arr: results from enchonest as an array
   */
  public function fetchAssocResult()
  {
    return json_decode(json_encode($this->http->getResponseXML()),true);
  }
  
  /**
   * Set an url parameter for the echonest request
   *
   * @param name     str: the key name
   * @param value    str: the corresponding value
   */
  public function setParameter($name, $value)
  {
    $this->parameters[] = array($name=>$value);
  }
  
  /**
   * Set Headers for the echonest request
   *
   * @param name    str: the http header name
   * @param value   str: the http header value
   */
  public function setHeader($name, $value)
  {
    $this->headers[$name] = $value;
  }
  
  /**
   * Get a list of parameters registered for the next echnonest query
   *
   * @return         arr: the parameters array
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  
  /**
   * Get the URI of the most recent echonest query
   *
   * @return         str: the last requested url - call after ->query()
   */
  public function getUri()
  {
    return $this->uri;
  }
  
  /**
   * Get the request headers set with the last call
   *
   * @return      arr: the headers array
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  
  /**
   * Get response time
   *
   * @return         flt: time request took in ms
   */
  public function getResponseTime()
  {
    return $this->responseTime;
  }
}