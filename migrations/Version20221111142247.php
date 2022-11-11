<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221111142247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voitures (id INT AUTO_INCREMENT NOT NULL, marques_id INT NOT NULL, user_id INT DEFAULT NULL, model_name VARCHAR(255) NOT NULL, prix NUMERIC(8, 2) NOT NULL, kilometrage INT NOT NULL, nbr_propi INT NOT NULL, puissance INT NOT NULL, cylindre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, carburant VARCHAR(255) NOT NULL, date DATE NOT NULL, slug VARCHAR(100) NOT NULL, INDEX IDX_8B58301BC256483C (marques_id), INDEX IDX_8B58301BA76ED395 (user_id), FULLTEXT INDEX voitures (model_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BC256483C FOREIGN KEY (marques_id) REFERENCES marques (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE images_voitures ADD CONSTRAINT FK_287B4D71181A8BA FOREIGN KEY (voiture_id) REFERENCES voitures (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images_voitures DROP FOREIGN KEY FK_287B4D71181A8BA');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BC256483C');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BA76ED395');
        $this->addSql('DROP TABLE voitures');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
