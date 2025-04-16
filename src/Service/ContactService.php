<?php

namespace App\Service;

class ContactService
{
    private const DEFAULT_PHONE = '8-800-DIGITS';
    private GeoReader $geoReader;

    public function __construct(GeoReader $geoReader)
    {
        $this->geoReader = $geoReader;
    }

    public function getContactPhone()
    {
        try{
            // получаем информацию о текущем городе по IP-адресу пользователя
            $city = $this->geoReader->readCurrentCity();

            if ($city) {
                // если получена информация о городе, то возвращаем телефон с городским кодом
                return $city->country->isoCode.'-'.$city->mostSpecificSubdivision->isoCode.'-DIGITS';
            } else {
                // если не получена информация о городе, то возвращаем телефон по умолчанию
                return self::DEFAULT_PHONE;
            }
        } catch (\Throwable $e) {
            return self::DEFAULT_PHONE;
        }
    }

    public function getContactEmail()
    {
        return 'mail@mail.ru';
    }
}