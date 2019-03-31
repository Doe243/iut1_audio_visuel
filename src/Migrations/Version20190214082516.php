<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190214082516 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lp_borrow_lp_product (lp_borrow_id INT NOT NULL, lp_product_id INT NOT NULL, INDEX IDX_379E1D9CD2797AB6 (lp_borrow_id), INDEX IDX_379E1D9CF23F831D (lp_product_id), PRIMARY KEY(lp_borrow_id, lp_product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lp_borrow_lp_product ADD CONSTRAINT FK_379E1D9CD2797AB6 FOREIGN KEY (lp_borrow_id) REFERENCES lp_borrow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lp_borrow_lp_product ADD CONSTRAINT FK_379E1D9CF23F831D FOREIGN KEY (lp_product_id) REFERENCES lp_product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lp_borrow_lp_product');
    }
}
