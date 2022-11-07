<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221107175443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE images_voitures (id INT AUTO_INCREMENT NOT NULL, voiture_id INT NOT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_287B4D71181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marques (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, slug VARCHAR(255) NOT NULL, roles JSON NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voitures (id INT AUTO_INCREMENT NOT NULL, marques_id INT NOT NULL, model_name VARCHAR(255) NOT NULL, prix NUMERIC(8, 2) NOT NULL, kilometrage INT NOT NULL, nbr_propi INT NOT NULL, puissance INT NOT NULL, cylindre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, carburant VARCHAR(255) NOT NULL, date DATE NOT NULL, slug VARCHAR(100) NOT NULL, INDEX IDX_8B58301BC256483C (marques_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images_voitures ADD CONSTRAINT FK_287B4D71181A8BA FOREIGN KEY (voiture_id) REFERENCES voitures (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BC256483C FOREIGN KEY (marques_id) REFERENCES marques (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images_voitures DROP FOREIGN KEY FK_287B4D71181A8BA');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BC256483C');
        $this->addSql('DROP TABLE images_voitures');
        $this->addSql('DROP TABLE marques');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE voitures');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
