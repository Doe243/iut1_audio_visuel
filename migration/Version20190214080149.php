<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190214080149 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lp_state (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_product_cat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_visa (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_user (id INT AUTO_INCREMENT NOT NULL, lp_role_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, banned TINYINT(1) NOT NULL, INDEX IDX_CCCCA5611F9B53E5 (lp_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_group (id INT AUTO_INCREMENT NOT NULL, user_group_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_5834B34C1ED93D47 (user_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_product (id INT AUTO_INCREMENT NOT NULL, lp_state_id INT DEFAULT NULL, lp_product_cat_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, disponibility TINYINT(1) NOT NULL, comment VARCHAR(255) NOT NULL, model VARCHAR(255) DEFAULT NULL, purchase_date DATETIME DEFAULT NULL, inventor_number INT DEFAULT NULL, store_number INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_1AD275E4A115D84 (lp_state_id), INDEX IDX_1AD275E47F0FCB74 (lp_product_cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_borrow (id INT AUTO_INCREMENT NOT NULL, lpgroup_id INT NOT NULL, lp_user_id INT NOT NULL, lp_visa_id INT NOT NULL, borrow_date DATETIME NOT NULL, borrow_return DATETIME NOT NULL, comment VARCHAR(255) DEFAULT NULL, comment_admin VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C18A67C343844973 (lpgroup_id), INDEX IDX_C18A67C36EF6A2DC (lp_user_id), INDEX IDX_C18A67C3505F03EF (lp_visa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lp_user ADD CONSTRAINT FK_CCCCA5611F9B53E5 FOREIGN KEY (lp_role_id) REFERENCES lp_role (id)');
        $this->addSql('ALTER TABLE lp_group ADD CONSTRAINT FK_5834B34C1ED93D47 FOREIGN KEY (user_group_id) REFERENCES lp_user (id)');
        $this->addSql('ALTER TABLE lp_product ADD CONSTRAINT FK_1AD275E4A115D84 FOREIGN KEY (lp_state_id) REFERENCES lp_state (id)');
        $this->addSql('ALTER TABLE lp_product ADD CONSTRAINT FK_1AD275E47F0FCB74 FOREIGN KEY (lp_product_cat_id) REFERENCES lp_product_cat (id)');
        $this->addSql('ALTER TABLE lp_borrow ADD CONSTRAINT FK_C18A67C343844973 FOREIGN KEY (lpgroup_id) REFERENCES lp_group (id)');
        $this->addSql('ALTER TABLE lp_borrow ADD CONSTRAINT FK_C18A67C36EF6A2DC FOREIGN KEY (lp_user_id) REFERENCES lp_user (id)');
        $this->addSql('ALTER TABLE lp_borrow ADD CONSTRAINT FK_C18A67C3505F03EF FOREIGN KEY (lp_visa_id) REFERENCES lp_visa (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lp_product DROP FOREIGN KEY FK_1AD275E4A115D84');
        $this->addSql('ALTER TABLE lp_product DROP FOREIGN KEY FK_1AD275E47F0FCB74');
        $this->addSql('ALTER TABLE lp_borrow DROP FOREIGN KEY FK_C18A67C3505F03EF');
        $this->addSql('ALTER TABLE lp_group DROP FOREIGN KEY FK_5834B34C1ED93D47');
        $this->addSql('ALTER TABLE lp_borrow DROP FOREIGN KEY FK_C18A67C36EF6A2DC');
        $this->addSql('ALTER TABLE lp_user DROP FOREIGN KEY FK_CCCCA5611F9B53E5');
        $this->addSql('ALTER TABLE lp_borrow DROP FOREIGN KEY FK_C18A67C343844973');
        $this->addSql('DROP TABLE lp_state');
        $this->addSql('DROP TABLE lp_product_cat');
        $this->addSql('DROP TABLE lp_visa');
        $this->addSql('DROP TABLE lp_user');
        $this->addSql('DROP TABLE lp_role');
        $this->addSql('DROP TABLE lp_group');
        $this->addSql('DROP TABLE lp_product');
        $this->addSql('DROP TABLE lp_borrow');
    }
}
