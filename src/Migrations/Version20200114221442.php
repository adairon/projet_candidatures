<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200114221442 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE statut_candidature');
        $this->addSql('ALTER TABLE candidature ADD statut_candidature_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8CBA3426C FOREIGN KEY (statut_candidature_id) REFERENCES statut (id)');
        $this->addSql('CREATE INDEX IDX_E33BD3B8CBA3426C ON candidature (statut_candidature_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8CBA3426C');
        $this->addSql('CREATE TABLE statut_candidature (id INT AUTO_INCREMENT NOT NULL, envoy??e VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, entretien_a_venir VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, attente_reponse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, refusee VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, acceptee VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP INDEX IDX_E33BD3B8CBA3426C ON candidature');
        $this->addSql('ALTER TABLE candidature DROP statut_candidature_id');
    }
}
