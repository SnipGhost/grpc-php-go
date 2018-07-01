<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Service;

/**
 * The greeting service definition.
 */
class GreeterClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Sends a greeting
     * @param \Service\Request $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHello(\Service\Request $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/service.Greeter/SayHello',
        $argument,
        ['\Service\Reply', 'decode'],
        $metadata, $options);
    }

    /**
     * Sends another greeting
     * @param \Service\Request $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SayHelloAgain(\Service\Request $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/service.Greeter/SayHelloAgain',
        $argument,
        ['\Service\Reply', 'decode'],
        $metadata, $options);
    }

}
