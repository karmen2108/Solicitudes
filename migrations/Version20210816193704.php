<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210816193704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notas (id INT AUTO_INCREMENT NOT NULL, organismo_id INT DEFAULT NULL, area_id INT DEFAULT NULL, fecha DATE NOT NULL, solicitante VARCHAR(100) NOT NULL, observacion VARCHAR(100) DEFAULT NULL, estado VARCHAR(20) DEFAULT NULL, INDEX IDX_657763883260D891 (organismo_id), INDEX IDX_65776388BD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notas ADD CONSTRAINT FK_657763883260D891 FOREIGN KEY (organismo_id) REFERENCES organismo (id)');
        $this->addSql('ALTER TABLE notas ADD CONSTRAINT FK_65776388BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notas');
    }
}
