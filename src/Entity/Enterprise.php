<?php


namespace Yemilgr\Infogreffe\Entity;

/**
 * Class Enterprise
 * @package Yemilgr\Infogreffe\Entity
 *
 * @property string $Siren
 * @property string $Denomination
 * @property string $CodeGreffe
 * @property string $LibelleGreffe
 * @property string $NomCommercial
 * @property string $Enseigne
 * @property string $Sigle
 * @property Address $Adresse
 * @property string $LibelleFormeJuridique
 * @property string $CodeActivite
 * @property string $LibelleActivite
 * @property string $DateImmatriculation
 * @property string $EtatRadiation
 * @property string $DateRadiation
 */
class Enterprise extends AbstractEntity
{
    public Address $Adresse;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);

        $this->Adresse = new Address($attributes['Adresse']);
    }
}