<?php

namespace YoutubeDownloader\Logger\Handler;

/**
 * Describes a handler instance
 */
interface Handler
{
	/**
	 * Check if this handler handels a log level
	 *
	 * @param string $level A valid log level from LogLevel class
	 * @return boolean
	 */
	public function handles($level);

	/**
	 * Handle an entry
	 *
	 * @param Entry $entry
	 * @return boolean
	 */
	public function handle(Entry $entry);
}
