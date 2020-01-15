<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115083321 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature CHANGE lien lien VARCHAR(255) NOT NULL, CHANGE plateforme plateforme VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8CBA3426C FOREIGN KEY (statut_candidature_id) REFERENCES statut (id)');
        $this->addSql('CREATE INDEX IDX_E33BD3B8CBA3426C ON candidature (statut_candidature_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8CBA3426C');
        $this->addSql('DROP INDEX IDX_E33BD3B8CBA3426C ON candidature');
        $this->addSql('ALTER TABLE candidature CHANGE lien lien VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE plateforme plateforme VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
