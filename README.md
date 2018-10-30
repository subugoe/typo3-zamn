# ZAMN - TYPO3 Extension

This extension includes the zamn-database with mathematicians heritages.

It is not configuratble, everything is hard-coded and delivers HTML Snippets.

In action: http://fidmath.de/historische-mathematik/liste-der-nachlaesse/

## TYPO3 9.5 (and above) routing

Please add a routing configuration such as

```yaml
  Zamn:
    type: Extbase
    extension: Zamn
    plugin: Hans
    routes:
      - { routePath: '{id}', _controller: 'Index::detail', _arguments: {'id': 'id'} }
    defaultController: 'Index::detail'
    aspects:
      id:
        type: PersistedAliasMapper
        tableName: 'tx_zamn_domain_model_hans'
        routeFieldName: 'uid'

```

to the site `config.yaml` file.
