<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210827110418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand ADD created_at DATETIME2(6) NOT NULL DEFAULT GETDATE()');
        $this->addSql('ALTER TABLE brand ADD updated_at DATETIME2(6) NOT NULL DEFAULT GETDATE()');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'brand\', N\'COLUMN\', created_at');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'brand\', N\'COLUMN\', updated_at');
//        $this->addSql('ALTER TABLE product DROP CONSTRAINT DF_D34A04AD_D0354274');
        $this->addSql('ALTER TABLE product ALTER COLUMN stock_quantity INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE brand DROP COLUMN created_at');
        $this->addSql('ALTER TABLE brand DROP COLUMN updated_at');
        $this->addSql('ALTER TABLE product ALTER COLUMN stock_quantity INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT DF_D34A04AD_D0354274 DEFAULT 0 FOR stock_quantity');
    }
}
