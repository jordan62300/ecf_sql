<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190204094433 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, genre_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre_serie (genre_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_173C8CF14296D31F (genre_id), INDEX IDX_173C8CF1D94388BD (serie_id), PRIMARY KEY(genre_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_serie (users_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_4D4D377D67B3B43D (users_id), INDEX IDX_4D4D377DD94388BD (serie_id), PRIMARY KEY(users_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, serie_name VARCHAR(255) NOT NULL, serie_genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, platform_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform_serie (platform_id INT NOT NULL, serie_id INT NOT NULL, INDEX IDX_9866F7B0FFE6496F (platform_id), INDEX IDX_9866F7B0D94388BD (serie_id), PRIMARY KEY(platform_id, serie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE genre_serie ADD CONSTRAINT FK_173C8CF14296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_serie ADD CONSTRAINT FK_173C8CF1D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_serie ADD CONSTRAINT FK_4D4D377D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_serie ADD CONSTRAINT FK_4D4D377DD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE platform_serie ADD CONSTRAINT FK_9866F7B0FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE platform_serie ADD CONSTRAINT FK_9866F7B0D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genre_serie DROP FOREIGN KEY FK_173C8CF14296D31F');
        $this->addSql('ALTER TABLE users_serie DROP FOREIGN KEY FK_4D4D377D67B3B43D');
        $this->addSql('ALTER TABLE genre_serie DROP FOREIGN KEY FK_173C8CF1D94388BD');
        $this->addSql('ALTER TABLE users_serie DROP FOREIGN KEY FK_4D4D377DD94388BD');
        $this->addSql('ALTER TABLE platform_serie DROP FOREIGN KEY FK_9866F7B0D94388BD');
        $this->addSql('ALTER TABLE platform_serie DROP FOREIGN KEY FK_9866F7B0FFE6496F');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE genre_serie');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_serie');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE platform_serie');
    }
}
