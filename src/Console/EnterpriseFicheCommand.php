<?php


namespace Yemilgr\Infogreffe\Console;


use Illuminate\Console\Command;
use Yemilgr\Infogreffe\Infogreffe;

/**
 * Class EnterpriseFicheCommand
 * @package Yemilgr\Infogreffe\Console
 */
class EnterpriseFicheCommand extends Command
{
    protected $signature = 'infogreffe:enterpriseFiche {siren}';

    protected $description = 'Fetch Enterprise Fiche';

    public function handle(Infogreffe $infogreffe)
    {
        $enterprise = $infogreffe->getEnterpriseFiche($this->argument('siren'));

        if (!$enterprise) {
            $this->error($infogreffe->getLastError());
            exit(1);
        }

        $this->info('Enterprise Fiche:');
        $this->line('---');
        $this->line('Siren: ' . $enterprise->Siren);
        $this->line('Denomination: ' . $enterprise->Denomination);
        $this->line('CodeGreffe: ' . $enterprise->CodeGreffe);
        $this->line('LibelleGreffe: ' . $enterprise->LibelleGreffe);
        $this->line('NomCommercial: ' . $enterprise->NomCommercial);
        $this->line('Enseigne: ' . $enterprise->Enseigne);
        $this->line('Sigle: ' . $enterprise->Sigle);
        $this->line('LibelleFormeJuridique: ' . $enterprise->LibelleFormeJuridique);
        $this->line('CodeActivite: ' . $enterprise->CodeActivite);
        $this->line('LibelleActivite: ' . $enterprise->LibelleActivite);
        $this->line('DateImmatriculation: ' . $enterprise->DateImmatriculation);
        $this->line('EtatRadiation: ' . $enterprise->EtatRadiation);
        $this->line('DateRadiation: ' . $enterprise->DateRadiation);
        $this->line('---');
    }
}