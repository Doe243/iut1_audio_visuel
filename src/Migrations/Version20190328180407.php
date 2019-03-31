<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328180407 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lp_user DROP FOREIGN KEY FK_CCCCA5611F9B53E5');
        $this->addSql('DROP INDEX IDX_CCCCA5611F9B53E5 ON lp_user');
        $this->addSql('ALTER TABLE lp_user DROP lp_role_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lp_user ADD lp_role_id INT NOT NULL');
        $this->addSql('ALTER TABLE lp_user ADD CONSTRAINT FK_CCCCA5611F9B53E5 FOREIGN KEY (lp_role_id) REFERENCES lp_role (id)');
        $this->addSql('CREATE INDEX IDX_CCCCA5611F9B53E5 ON lp_user (lp_role_id)');
    }
}
