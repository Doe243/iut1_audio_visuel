<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328180954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lp_user_lp_role (lp_user_id INT NOT NULL, lp_role_id INT NOT NULL, INDEX IDX_21639FC66EF6A2DC (lp_user_id), INDEX IDX_21639FC61F9B53E5 (lp_role_id), PRIMARY KEY(lp_user_id, lp_role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lp_user_lp_role ADD CONSTRAINT FK_21639FC66EF6A2DC FOREIGN KEY (lp_user_id) REFERENCES lp_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lp_user_lp_role ADD CONSTRAINT FK_21639FC61F9B53E5 FOREIGN KEY (lp_role_id) REFERENCES lp_role (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lp_user_lp_role');
    }
}
