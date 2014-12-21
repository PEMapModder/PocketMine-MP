<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

namespace pocketmine\plugin;

abstract class PluginError{

	/** @var bool whether the exception is consumed. */
	private $consumed = false;

	/**
	 * @return \Exception
	 */
	public abstract function getException();

	/*
	 * @return bool
	 */
	public function isConsumed(){
		return $this->consumed;
	}

	/**
	 * Consume the error. If an error is consumed, the exception will not be logged.
	*/
	public function consume(){
		$this->consumed = true;
	}

	/**
	 * Undo consume()
	 */
	public function unconsume(){
		$this->consumed = false;
	}

}
