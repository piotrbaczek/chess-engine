<?php

namespace piotrbaczek\ChessEngine\Bitboard;

use phpseclib3\Math\BigInteger;

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
        $this->fileAMask = new InternalBitboard(new BigInteger('0101010101010101',16));
        $this->fileBMask = new InternalBitboard(new BigInteger('0202020202020202',16));
        $this->fileCMask = new InternalBitboard(new BigInteger('0404040404040404',16));
        $this->fileDMask = new InternalBitboard(new BigInteger('0808080808080808',16));
        $this->fileEMask = new InternalBitboard(new BigInteger('1010101010101010',16));
        $this->fileFMask = new InternalBitboard(new BigInteger('2020202020202020',16));
        $this->fileGMask = new InternalBitboard(new BigInteger('4040404040404040',16));
        $this->fileHMask = new InternalBitboard(new BigInteger('8080808080808080',16));

        $this->rank1Mask = new InternalBitboard(new BigInteger('FF', 16));
        $this->rank2Mask = new InternalBitboard(new BigInteger('FF00', 16));
        $this->rank3Mask = new InternalBitboard(new BigInteger('FF0000', 16));
        $this->rank4Mask = new InternalBitboard(new BigInteger('FF000000', 16));
        $this->rank5Mask = new InternalBitboard(new BigInteger('FF00000000', 16));
        $this->rank6Mask = new InternalBitboard(new BigInteger('FF0000000000', 16));
        $this->rank7Mask = new InternalBitboard(new BigInteger('FF000000000000', 16));
        $this->rank8Mask = new InternalBitboard(new BigInteger('FF00000000000000', 16));
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