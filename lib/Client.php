<?php 
class Client {
	private $uri;
	private $jsonrpc;

	function __construct($host, $port, $user, $pass)
	{
		$this->uri = "http://" . $user . ":" . $pass . "@" . $host . ":" . $port . "/";
		$this->jsonrpc = new jsonRPCClient($this->uri);
	}

	function getblockhash ($block_index)
	{
		return $this->jsonrpc->getblockhash($block_index);
	}
	
	function getblock ($block_hash)
	{
		return $this->jsonrpc->getblock($block_hash);
	}
	
	function gettransaction ($blk_transtmp)
	{
		return $this->jsonrpc->gettransaction($blk_transtmp);
	}
	
	function getrawtransaction ($tx_id, $verbose=1)
	{
		return $this->jsonrpc->getrawtransaction($tx_id, $verbose=1);
	}
	
	function getinfo ()
	{
		return $this->jsonrpc->getinfo();
	}
	
	function getmininginfo ()
	{
		return $this->jsonrpc->getmininginfo();
	}
	
	function gettxoutsetinfo ()
	{	 
		return $this->jsonrpc->gettxoutsetinfo();
	}
	
	function getdifficulty ()
	{
		return $this->jsonrpc->getdifficulty();
	}
}
?>
