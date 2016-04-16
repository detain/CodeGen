<?php
namespace CodeGen\Frameworks\Apache2;

class VirtualHostProperties {




    /**
     * @var string
     * @synthesize
     */
    protected $documentRoot;

    /**
     * @var string
     * @synthesize
     */
    protected $serverName;

    /**
     * @var string
     * @synthesize
     */
    protected $serverAdmin;

    /**
     * @var string
     * @synthesize
     */
    protected $serverPath;


    /**
     * @var string[]
     * @synthesize
     */
    protected $serverAliases;

    /**
     * @var string
     * @synthesize
     */
    protected $customLog;

    /**
     * @var string
     * @synthesize
     */
    protected $errorLog;


    /**
     * @var string
     * @synthesize
     */
    protected $proxyPreserverHost;

    /**
     * @var string
     * @synthesize
     */
    protected $proxyPass;

    /**
     * @var string
     * @synthesize
     */
    protected $proxyPassReverse;

    /**
     * @var boolean
     * @synthesize
     */
    protected $rewriteEngine;

    /**
     * @var string[]
     * @synthesize
     */
    protected $rewriteRules;

    /**
     * @var string[string]
     * @synthesize
     */
    protected $env;

    protected $bindHost;

    protected $bindPort;

    public function __construct($bindHost = '*', $bindPort = 80)
    {
        $this->bindHost = $bindHost;
        $this->bindPort = $bindPort;
    }




}
