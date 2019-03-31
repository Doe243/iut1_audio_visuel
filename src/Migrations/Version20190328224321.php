<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190328224321 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lp_borrow (id INT AUTO_INCREMENT NOT NULL, lpgroup_id INT DEFAULT NULL, lp_user_id INT NOT NULL, lp_visa_id INT NOT NULL, borrow_date DATETIME NOT NULL, borrow_return DATETIME NOT NULL, comment VARCHAR(255) DEFAULT NULL, comment_admin VARCHAR(255) DEFAULT NULL, borrow_return_date DATETIME DEFAULT NULL, group_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C18A67C343844973 (lpgroup_id), INDEX IDX_C18A67C36EF6A2DC (lp_user_id), INDEX IDX_C18A67C3505F03EF (lp_visa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_borrow_lp_product (lp_borrow_id INT NOT NULL, lp_product_id INT NOT NULL, INDEX IDX_379E1D9CD2797AB6 (lp_borrow_id), INDEX IDX_379E1D9CF23F831D (lp_product_id), PRIMARY KEY(lp_borrow_id, lp_product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_group (id INT AUTO_INCREMENT NOT NULL, user_group_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_5834B34C1ED93D47 (user_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_product (id INT AUTO_INCREMENT NOT NULL, lp_state_id INT DEFAULT NULL, lp_product_cat_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, disponibility TINYINT(1) NOT NULL, comment VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, purchase_date DATETIME DEFAULT NULL, inventor_number INT DEFAULT NULL, store_number INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_1AD275E4A115D84 (lp_state_id), INDEX IDX_1AD275E47F0FCB74 (lp_product_cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_product_cat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_state (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, banned TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_user_lp_role (lp_user_id INT NOT NULL, lp_role_id INT NOT NULL, INDEX IDX_21639FC66EF6A2DC (lp_user_id), INDEX IDX_21639FC61F9B53E5 (lp_role_id), PRIMARY KEY(lp_user_id, lp_role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lp_visa (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lp_borrow ADD CONSTRAINT FK_C18A67C343844973 FOREIGN KEY (lpgroup_id) REFERENCES lp_group (id)');
        $this->addSql('ALTER TABLE lp_borrow ADD CONSTRAINT FK_C18A67C36EF6A2DC FOREIGN KEY (lp_user_id) REFERENCES lp_user (id)');
        $this->addSql('ALTER TABLE lp_borrow ADD CONSTRAINT FK_C18A67C3505F03EF FOREIGN KEY (lp_visa_id) REFERENCES lp_visa (id)');
        $this->addSql('ALTER TABLE lp_borrow_lp_product ADD CONSTRAINT FK_379E1D9CD2797AB6 FOREIGN KEY (lp_borrow_id) REFERENCES lp_borrow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lp_borrow_lp_product ADD CONSTRAINT FK_379E1D9CF23F831D FOREIGN KEY (lp_product_id) REFERENCES lp_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lp_group ADD CONSTRAINT FK_5834B34C1ED93D47 FOREIGN KEY (user_group_id) REFERENCES lp_user (id)');
        $this->addSql('ALTER TABLE lp_product ADD CONSTRAINT FK_1AD275E4A115D84 FOREIGN KEY (lp_state_id) REFERENCES lp_state (id)');
        $this->addSql('ALTER TABLE lp_product ADD CONSTRAINT FK_1AD275E47F0FCB74 FOREIGN KEY (lp_product_cat_id) REFERENCES lp_product_cat (id)');
        $this->addSql('ALTER TABLE lp_user_lp_role ADD CONSTRAINT FK_21639FC66EF6A2DC FOREIGN KEY (lp_user_id) REFERENCES lp_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lp_user_lp_role ADD CONSTRAINT FK_21639FC61F9B53E5 FOREIGN KEY (lp_role_id) REFERENCES lp_role (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lp_borrow_lp_product DROP FOREIGN KEY FK_379E1D9CD2797AB6');
        $this->addSql('ALTER TABLE lp_borrow DROP FOREIGN KEY FK_C18A67C343844973');
        $this->addSql('ALTER TABLE lp_borrow_lp_product DROP FOREIGN KEY FK_379E1D9CF23F831D');
        $this->addSql('ALTER TABLE lp_product DROP FOREIGN KEY FK_1AD275E47F0FCB74');
        $this->addSql('ALTER TABLE lp_user_lp_role DROP FOREIGN KEY FK_21639FC61F9B53E5');
        $this->addSql('ALTER TABLE lp_product DROP FOREIGN KEY FK_1AD275E4A115D84');
        $this->addSql('ALTER TABLE lp_borrow DROP FOREIGN KEY FK_C18A67C36EF6A2DC');
        $this->addSql('ALTER TABLE lp_group DROP FOREIGN KEY FK_5834B34C1ED93D47');
        $this->addSql('ALTER TABLE lp_user_lp_role DROP FOREIGN KEY FK_21639FC66EF6A2DC');
        $this->addSql('ALTER TABLE lp_borrow DROP FOREIGN KEY FK_C18A67C3505F03EF');
        $this->addSql('DROP TABLE lp_borrow');
        $this->addSql('DROP TABLE lp_borrow_lp_product');
        $this->addSql('DROP TABLE lp_group');
        $this->addSql('DROP TABLE lp_product');
        $this->addSql('DROP TABLE lp_product_cat');
        $this->addSql('DROP TABLE lp_role');
        $this->addSql('DROP TABLE lp_state');
        $this->addSql('DROP TABLE lp_user');
        $this->addSql('DROP TABLE lp_user_lp_role');
        $this->addSql('DROP TABLE lp_visa');
    }
}
