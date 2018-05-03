<?php

namespace Subugoe\Zamn\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class HansRepository
{
    public function findAll(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_zamn_domain_model_hans');

        return $queryBuilder->select('*')
            ->from('tx_zamn_domain_model_hans')
            ->execute()
            ->fetchAll();
    }

    public function findByUid(int $uid): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_zamn_domain_model_hans');

        $dataset = $queryBuilder->select('*')
            ->from('tx_zamn_domain_model_hans')
            ->where($queryBuilder->expr()->eq('uid', $uid))
            ->execute()
            ->fetchAll()[0];

        $dataset['content'] = trim($dataset['content']);
        $dataset['kalliope'] = unserialize($dataset['kalliope']);

        return $dataset;
    }
}
