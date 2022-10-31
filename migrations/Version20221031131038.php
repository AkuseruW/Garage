<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031131038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marques (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voitures ADD marques_id INT NOT NULL');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BC256483C FOREIGN KEY (marques_id) REFERENCES marques (id)');
        $this->addSql('CREATE INDEX IDX_8B58301BC256483C ON voitures (marques_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BC256483C');
        $this->addSql('DROP TABLE marques');
        $this->addSql('DROP INDEX IDX_8B58301BC256483C ON voitures');
        $this->addSql('ALTER TABLE voitures DROP marques_id');
    }
}
