<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210111220859 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        /*$this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, activite VARCHAR(50) DEFAULT NULL, adresse VARCHAR(50) DEFAULT NULL, site VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(100) NOT NULL, niveau VARCHAR(15) DEFAULT NULL, ville VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, titre VARCHAR(150) NOT NULL, descriptif VARCHAR(1000) DEFAULT NULL, date_debut DATE DEFAULT NULL, duree VARCHAR(15) DEFAULT NULL, competences_requises VARCHAR(500) DEFAULT NULL, experience_requise VARCHAR(100) DEFAULT NULL, INDEX IDX_C27C9369A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_formation (stage_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_734BDB9E2298D193 (stage_id), INDEX IDX_734BDB9E5200282E (formation_id), PRIMARY KEY(stage_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE stage_formation ADD CONSTRAINT FK_734BDB9E2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_formation ADD CONSTRAINT FK_734BDB9E5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
    */}

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369A4AEAFEA');
        $this->addSql('ALTER TABLE stage_formation DROP FOREIGN KEY FK_734BDB9E5200282E');
        $this->addSql('ALTER TABLE stage_formation DROP FOREIGN KEY FK_734BDB9E2298D193');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE stage_formation');
    }
}
