<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200107113311 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature CHANGE date_envoi date_envoi DATE NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD contact_nom_id INT NOT NULL, ADD candidature_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8658802B68 FOREIGN KEY (contact_nom_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86B6121583 FOREIGN KEY (candidature_id) REFERENCES candidature (id)');
        $this->addSql('CREATE INDEX IDX_10C31F8658802B68 ON rdv (contact_nom_id)');
        $this->addSql('CREATE INDEX IDX_10C31F86B6121583 ON rdv (candidature_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidature CHANGE date_envoi date_envoi DATETIME NOT NULL');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8658802B68');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86B6121583');
        $this->addSql('DROP INDEX IDX_10C31F8658802B68 ON rdv');
        $this->addSql('DROP INDEX IDX_10C31F86B6121583 ON rdv');
        $this->addSql('ALTER TABLE rdv DROP contact_nom_id, DROP candidature_id');
    }
}
