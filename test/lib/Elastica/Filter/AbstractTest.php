<?php

require_once dirname(__FILE__) . '/../../../bootstrap.php';


class Elastica_Filter_AbstractTest extends PHPUnit_Framework_TestCase {
	public function testSetCached() {
		$stubFilter = $this->getStub();
		
		$stubFilter->setCached(true);
		$arrayFilter = current($stubFilter->toArray());
		$this->assertTrue($arrayFilter['_cache']);
		
		$stubFilter->setCached(false);
		$arrayFilter = current($stubFilter->toArray());
		$this->assertFalse($arrayFilter['_cache']);
	}
	
	public function testSetCachedDefaultValue() {
		$stubFilter = $this->getStub();
		
		$stubFilter->setCached();
		$arrayFilter = current($stubFilter->toArray());
		$this->assertTrue($arrayFilter['_cache']);
	}
	
	public function testSetCacheKey() {
		$stubFilter = $this->getStub();
		
		$cacheKey = 'myCacheKey';
		
		$stubFilter->setCacheKey($cacheKey);
		$arrayFilter = current($stubFilter->toArray());
		$this->assertEquals($cacheKey, $arrayFilter['_cache_key']);
	}
	
	/**
	 * @expectedException Elastica_Exception_Invalid
	 */
	public function testSetCacheKeyEmptyKey() {
		$stubFilter = $this->getStub();
		
		$cacheKey = '';
		
		$stubFilter->setCacheKey($cacheKey);
	}
	
	private function getStub() {
		return $this->getMockForAbstractClass('Elastica_Filter_Abstract');
	}
}
