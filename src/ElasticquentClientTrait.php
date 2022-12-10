<?php

namespace Elasticquent;

trait ElasticquentClientTrait
{
    use ElasticquentConfigTrait;

    /**
     * Get ElasticSearch Client
     *
     * @return \Elastic\Elasticsearch\Client
     */
    public function getElasticSearchClient()
    {
        $config = $this->getElasticConfig();

	    $clientBuilder = \Elastic\Elasticsearch\ClientBuilder::create()
		    ->setHosts($config['hosts'])
	        ->setRetries($config['retries']);

	    if (!empty($config['username'])) {
		    $clientBuilder->setBasicAuthentication($config['username'], $config['password']);
	    }

	    if (!empty($config['certificate'])) {
		    $clientBuilder->setCABundle($config['certificate']);
	    }

        return $clientBuilder->build();
    }

}
