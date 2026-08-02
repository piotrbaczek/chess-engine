<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use piotrbaczek\ChessEngine\Common\HexInteger;

class Masks
{
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
        $this->fileAMask = new InternalBitboard(new HexInteger('0101010101010101'));
        $this->fileBMask = new InternalBitboard(new HexInteger('0202020202020202'));
        $this->fileCMask = new InternalBitboard(new HexInteger('0404040404040404'));
        $this->fileDMask = new InternalBitboard(new HexInteger('0808080808080808'));
        $this->fileEMask = new InternalBitboard(new HexInteger('1010101010101010'));
        $this->fileFMask = new InternalBitboard(new HexInteger('2020202020202020'));
        $this->fileGMask = new InternalBitboard(new HexInteger('4040404040404040'));
        $this->fileHMask = new InternalBitboard(new HexInteger('8080808080808080'));

        $this->rank1Mask = new InternalBitboard(new HexInteger('FF'));
        $this->rank2Mask = new InternalBitboard(new HexInteger('FF00'));
        $this->rank3Mask = new InternalBitboard(new HexInteger('FF0000'));
        $this->rank4Mask = new InternalBitboard(new HexInteger('FF000000'));
        $this->rank5Mask = new InternalBitboard(new HexInteger('FF00000000'));
        $this->rank6Mask = new InternalBitboard(new HexInteger('FF0000000000'));
        $this->rank7Mask = new InternalBitboard(new HexInteger('FF000000000000'));
        $this->rank8Mask = new InternalBitboard(new HexInteger('FF00000000000000'));
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