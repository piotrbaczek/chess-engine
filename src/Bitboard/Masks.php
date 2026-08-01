<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use phpseclib3\Math\BigInteger;

class Masks
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

    private InternalBitboard $fileAMask;
    private InternalBitboard $fileBMask;
    private InternalBitboard $fileCMask;
    private InternalBitboard $fileDMask;
    private InternalBitboard $fileEMask;
    private InternalBitboard $fileFMask;
    private InternalBitboard $fileGMask;
    private InternalBitboard $fileHMask;
    private InternalBitboard $rank1Mask;
    private InternalBitboard $rank2Mask;
    private InternalBitboard $rank3Mask;
    private InternalBitboard $rank4Mask;
    private InternalBitboard $rank5Mask;
    private InternalBitboard $rank6Mask;
    private InternalBitboard $rank7Mask;
    private InternalBitboard $rank8Mask;

    public function __construct()
    {
        foreach (self::FILES as $file => $hex) {
            $property = "file{$file}Mask";
            $this->{$property} = new InternalBitboard(new BigInteger($hex, 16));
        }

        foreach (self::RANKS as $rank => $hex) {
            $property = "rank{$rank}Mask";
            $this->{$property} = new InternalBitboard(new BigInteger($hex, 16));
        }
    }

    public function getFileAMask(): InternalBitboard
    {
        return $this->fileAMask;
    }

    public function getFileBMask(): InternalBitboard
    {
        return $this->fileBMask;
    }

    public function getFileCMask(): InternalBitboard
    {
        return $this->fileCMask;
    }

    public function getFileDMask(): InternalBitboard
    {
        return $this->fileDMask;
    }

    public function getFileEMask(): InternalBitboard
    {
        return $this->fileEMask;
    }

    public function getFileFMask(): InternalBitboard
    {
        return $this->fileFMask;
    }

    public function getFileGMask(): InternalBitboard
    {
        return $this->fileGMask;
    }

    public function getFileHMask(): InternalBitboard
    {
        return $this->fileHMask;
    }

    public function getRank1Mask(): InternalBitboard
    {
        return $this->rank1Mask;
    }

    public function getRank2Mask(): InternalBitboard
    {
        return $this->rank2Mask;
    }

    public function getRank3Mask(): InternalBitboard
    {
        return $this->rank3Mask;
    }

    public function getRank4Mask(): InternalBitboard
    {
        return $this->rank4Mask;
    }

    public function getRank5Mask(): InternalBitboard
    {
        return $this->rank5Mask;
    }

    public function getRank6Mask(): InternalBitboard
    {
        return $this->rank6Mask;
    }

    public function getRank7Mask(): InternalBitboard
    {
        return $this->rank7Mask;
    }

    public function getRank8Mask(): InternalBitboard
    {
        return $this->rank8Mask;
    }
}