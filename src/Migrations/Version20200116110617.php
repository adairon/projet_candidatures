<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200116110617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, etape VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidature ADD etape_id INT DEFAULT NULL, DROP statut_candidature_id');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B84A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id)');
        $this->addSql('CREATE INDEX IDX_E33BD3B84A8CA2AD ON candidature (etape_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B84A8CA2AD');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP INDEX IDX_E33BD3B84A8CA2AD ON candidature');
        $this->addSql('ALTER TABLE candidature ADD statut_candidature_id INT NOT NULL, DROP etape_id');
    }
}
