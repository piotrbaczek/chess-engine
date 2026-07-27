<?php

namespace piotrbaczek\ChessEngine;

use phpseclib3\Math\BigInteger;
use piotrbaczek\ChessEngine\Bitboard\InternalBitboard;

class Bitboard
{
    private const FILES = [
        'A' => '0101010101010101',
        'B' => '0202020202020202',
        'C' => '0404040404040404',
        'D' => '0808080808080808',
        'E' => '1010101010101010',
        'F' => '2020202020202020',
        'G' => '4040404040404040',
        'H' => '8080808080808080',
    ];

    private const RANKS = [
        1 => 'FF',
        2 => 'FF00',
        3 => 'FF0000',
        4 => 'FF000000',
        5 => 'FF00000000',
        6 => 'FF0000000000',
        7 => 'FF000000000000',
        8 => 'FF00000000000000',
    ];

    private InternalBitboard $fileABB;
    private InternalBitboard $fileBBB;
    private InternalBitboard $fileCBB;
    private InternalBitboard $fileDBB;
    private InternalBitboard $fileEBB;
    private InternalBitboard $fileFBB;
    private InternalBitboard $fileGBB;
    private InternalBitboard $fileHBB;
    private InternalBitboard $rank1BB;
    private InternalBitboard $rank2BB;
    private InternalBitboard $rank3BB;
    private InternalBitboard $rank4BB;
    private InternalBitboard $rank5BB;
    private InternalBitboard $rank6BB;
    private InternalBitboard $rank7BB;
    private InternalBitboard $rank8BB;

    public function __construct()
    {
        foreach (self::FILES as $file => $hex) {
            $property = "file{$file}BB";
            $this->{$property} = new InternalBitboard(new BigInteger($hex, 16));
        }

        foreach (self::RANKS as $rank => $hex) {
            $property = "rank{$rank}BB";
            $this->{$property} = new InternalBitboard(new BigInteger($hex, 16));
        }
    }

    public function getFileABB(): InternalBitboard
    {
        return $this->fileABB;
    }

    public function getFileBBB(): InternalBitboard
    {
        return $this->fileBBB;
    }

    public function getFileCBB(): InternalBitboard
    {
        return $this->fileCBB;
    }

    public function getFileDBB(): InternalBitboard
    {
        return $this->fileDBB;
    }

    public function getFileEBB(): InternalBitboard
    {
        return $this->fileEBB;
    }

    public function getFileFBB(): InternalBitboard
    {
        return $this->fileFBB;
    }

    public function getFileGBB(): InternalBitboard
    {
        return $this->fileGBB;
    }

    public function getFileHBB(): InternalBitboard
    {
        return $this->fileHBB;
    }

    public function getRank1BB(): InternalBitboard
    {
        return $this->rank1BB;
    }

    public function getRank2BB(): InternalBitboard
    {
        return $this->rank2BB;
    }

    public function getRank3BB(): InternalBitboard
    {
        return $this->rank3BB;
    }

    public function getRank4BB(): InternalBitboard
    {
        return $this->rank4BB;
    }

    public function getRank5BB(): InternalBitboard
    {
        return $this->rank5BB;
    }

    public function getRank6BB(): InternalBitboard
    {
        return $this->rank6BB;
    }

    public function getRank7BB(): InternalBitboard
    {
        return $this->rank7BB;
    }

    public function getRank8BB(): InternalBitboard
    {
        return $this->rank8BB;
    }
}