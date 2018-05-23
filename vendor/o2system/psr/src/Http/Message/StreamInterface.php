<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

namespace O2System\Psr\Http\Message;

// ------------------------------------------------------------------------

/**
 * Interface StreamInterface
 *
 * Describes a data stream.
 *
 * Typically, an instance will wrap a PHP stream; this interface provides
 * a wrapper around the most common operations, including serialization of
 * the entire stream to a string.
 *
 * @package O2System\Psr\Http\Message
 */
interface StreamInterface
{
    /**
     * StreamInterface::__toString
     *
     * Reads all data from the stream into a string, from the beginning to end.
     *
     * This method MUST attempt to seek to the beginning of the stream before
     * reading data and read the stream until the end is reached.
     *
     * Warning: This could attempt to load a large amount of data into memory.
     *
     * This method MUST NOT raise an exception in order to conform with PHP's
     * string casting operations.
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#object.tostring
     * @return string
     */
    public function __toString();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::close
     *
     * Closes the stream and any underlying resources.
     *
     * @return void
     */
    public function close();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::detach
     *
     * Separates any underlying resources from the stream.
     *
     * After the stream has been detached, the stream is in an unusable state.
     *
     * @return resource|null Underlying PHP stream, if any
     */
    public function detach();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::getSize
     *
     * Get the size of the stream if known.
     *
     * @return int|null Returns the size in bytes if known, or null if unknown.
     */
    public function getSize();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::tell
     *
     * Returns the current position of the file read/write pointer
     *
     * @return int Position of the file pointer
     * @throws \RuntimeException on error.
     */
    public function tell();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::eof
     *
     * Returns true if the stream is at the end of the stream.
     *
     * @return bool
     */
    public function eof();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::isSeekable
     *
     * Returns whether or not the stream is seekable.
     *
     * @return bool
     */
    public function isSeekable();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::seek
     *
     * Seek to a position in the stream.
     *
     * @see http://www.php.net/manual/en/function.fseek.php
     *
     * @param int $offset Stream offset
     * @param int $whence Specifies how the cursor position will be calculated
     *                    based on the seek offset. Valid values are identical to the built-in
     *                    PHP $whence values for `fseek()`.  SEEK_SET: Set position equal to
     *                    offset bytes SEEK_CUR: Set position to current location plus offset
     *                    SEEK_END: Set position to end-of-stream plus offset.
     *
     * @throws \RuntimeException on failure.
     */
    public function seek( $offset, $whence = SEEK_SET );

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::rewind
     *
     * Seek to the beginning of the stream.
     *
     * If the stream is not seekable, this method will raise an exception;
     * otherwise, it will perform a seek(0).
     *
     * @see seek()
     * @see http://www.php.net/manual/en/function.fseek.php
     * @throws \RuntimeException on failure.
     */
    public function rewind();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::isWritable
     *
     * Returns whether or not the stream is writable.
     *
     * @return bool
     */
    public function isWritable();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::write
     *
     * Write data to the stream.
     *
     * @param string $string The string that is to be written.
     *
     * @return int Returns the number of bytes written to the stream.
     * @throws \RuntimeException on failure.
     */
    public function write( $string );

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::isReadable
     *
     * Returns whether or not the stream is readable.
     *
     * @return bool
     */
    public function isReadable();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::read
     *
     * Read data from the stream.
     *
     * @param int $length Read up to $length bytes from the object and return
     *                    them. Fewer than $length bytes may be returned if underlying stream
     *                    call returns fewer bytes.
     *
     * @return string Returns the data read from the stream, or an empty string
     *     if no bytes are available.
     * @throws \RuntimeException if an error occurs.
     */
    public function read( $length );

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::getContents
     *
     * Returns the remaining contents in a string
     *
     * @return string
     * @throws \RuntimeException if unable to read.
     * @throws \RuntimeException if error occurs while reading.
     */
    public function getContents();

    // ------------------------------------------------------------------------

    /**
     * StreamInterface::getMetadata
     *
     * Get stream metadata as an associative array or retrieve a specific key.
     *
     * The keys returned are identical to the keys returned from PHP's
     * stream_get_meta_data() function.
     *
     * @see http://php.net/manual/en/function.stream-get-meta-data.php
     *
     * @param string $key Specific metadata to retrieve.
     *
     * @return array|mixed|null Returns an associative array if no key is
     *     provided. Returns a specific key value if a key is provided and the
     *     value is found, or null if the key is not found.
     */
    public function getMetadata( $key = null );
}