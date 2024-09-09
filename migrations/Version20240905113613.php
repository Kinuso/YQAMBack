<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905113613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, quantity DOUBLE PRECISION NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_6BAF787059D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, carbs DOUBLE PRECISION NOT NULL, protein DOUBLE PRECISION NOT NULL, fat DOUBLE PRECISION NOT NULL, calories INT NOT NULL, for_how_many_people INT NOT NULL, INDEX IDX_DA88B1379D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_type (recipe_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_F3C50DF659D8A214 (recipe_id), INDEX IDX_F3C50DF6C54C8C93 (type_id), PRIMARY KEY(recipe_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_categories (recipe_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_738DC00B59D8A214 (recipe_id), INDEX IDX_738DC00BA21214B7 (categories_id), PRIMARY KEY(recipe_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, description VARCHAR(255) NOT NULL, number INT NOT NULL, INDEX IDX_43B9FE3C59D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE up_vote (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_E9092F519D86650F (user_id_id), INDEX IDX_E9092F5159D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, created_at DATE NOT NULL, dgpr_acceptation_date DATE NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787059D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B1379D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE recipe_type ADD CONSTRAINT FK_F3C50DF659D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_type ADD CONSTRAINT FK_F3C50DF6C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_categories ADD CONSTRAINT FK_738DC00B59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_categories ADD CONSTRAINT FK_738DC00BA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE up_vote ADD CONSTRAINT FK_E9092F519D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE up_vote ADD CONSTRAINT FK_E9092F5159D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787059D8A214');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B1379D86650F');
        $this->addSql('ALTER TABLE recipe_type DROP FOREIGN KEY FK_F3C50DF659D8A214');
        $this->addSql('ALTER TABLE recipe_type DROP FOREIGN KEY FK_F3C50DF6C54C8C93');
        $this->addSql('ALTER TABLE recipe_categories DROP FOREIGN KEY FK_738DC00B59D8A214');
        $this->addSql('ALTER TABLE recipe_categories DROP FOREIGN KEY FK_738DC00BA21214B7');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C59D8A214');
        $this->addSql('ALTER TABLE up_vote DROP FOREIGN KEY FK_E9092F519D86650F');
        $this->addSql('ALTER TABLE up_vote DROP FOREIGN KEY FK_E9092F5159D8A214');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_type');
        $this->addSql('DROP TABLE recipe_categories');
        $this->addSql('DROP TABLE step');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE up_vote');
        $this->addSql('DROP TABLE `user`');
    }
}
