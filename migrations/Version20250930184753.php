<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250930184753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fromage DROP FOREIGN KEY FK_BFBF0C8971179CD6');
        $this->addSql('DROP INDEX IDX_BFBF0C8971179CD6 ON fromage');
        $this->addSql('ALTER TABLE fromage ADD name VARCHAR(255) NOT NULL, CHANGE name_id burger_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fromage ADD CONSTRAINT FK_BFBF0C8917CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
        $this->addSql('CREATE INDEX IDX_BFBF0C8917CE5090 ON fromage (burger_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fromage DROP FOREIGN KEY FK_BFBF0C8917CE5090');
        $this->addSql('DROP INDEX IDX_BFBF0C8917CE5090 ON fromage');
        $this->addSql('ALTER TABLE fromage DROP name, CHANGE burger_id name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fromage ADD CONSTRAINT FK_BFBF0C8971179CD6 FOREIGN KEY (name_id) REFERENCES burger (id)');
        $this->addSql('CREATE INDEX IDX_BFBF0C8971179CD6 ON fromage (name_id)');
    }
}
