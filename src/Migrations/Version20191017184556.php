<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191017184556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE register_date register_date DATETIME DEFAULT \'1800-01-01 00-00-00\' NOT NULL');
        $this->addSql('ALTER TABLE user_log ADD login_time DATETIME DEFAULT \'1800-01-01 00-00-00\' NOT NULL, ADD ip VARBINARY(16) NOT NULL COMMENT \'(DC2Type:ip)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE register_date register_date DATETIME DEFAULT \'1800-01-01 00:00:00\' NOT NULL');
        $this->addSql('ALTER TABLE user_log DROP login_time, DROP ip');
    }
}