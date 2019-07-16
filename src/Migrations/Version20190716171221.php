<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190716171221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE weather (id INT AUTO_INCREMENT NOT NULL, create_datetime DATETIME NOT NULL, lat NUMERIC(9, 6) NOT NULL, lng NUMERIC(9, 6) NOT NULL, city VARCHAR(255) NOT NULL, temperature DOUBLE PRECISION NOT NULL, clouds SMALLINT NOT NULL, wind_speed DOUBLE PRECISION NOT NULL, wind_deg DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE history');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, create_datetime DATETIME NOT NULL, lat NUMERIC(9, 6) NOT NULL, lng NUMERIC(9, 6) NOT NULL, city VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, data JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE weather');
    }
}
