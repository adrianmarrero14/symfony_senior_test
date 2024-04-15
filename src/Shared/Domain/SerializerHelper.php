<?php

namespace App\Shared;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerHelper
{
    private $encoders;
    private $normalizers;
    public $serializer;

    public function __construct(){
        $this->encoders = [new XmlEncoder(), new JsonEncoder()];
        $this->normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($this->normalizers, $this->encoders);
    }

    public static function jsonToModel(string $json, $model)
    {
        $serializerHelper = new self();

        return $serializerHelper->serializer->deserialize($json, $model, 'json');
    }

    public static function modelToXML($model)
    {
        $serializerHelper = new self();

        return $serializerHelper->serializer->serialize($model, 'xml');
    }
}