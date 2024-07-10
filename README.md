# WordPress Custom Theme

## Development

Execute simultaneously:

```sh
npm run css:dev
npm run js:dev
```

## Deployment

```sh
npm run build:prod
```

## Troubleshooting

### Short Tags

Enable `short_open_tag` in `php.ini`. After that, execute something like:

```sh
sudo systemctl restart php8.3-fpm
```

### Query String

This URL should filter by both tags and search term:

```
/tag/competitive-programming/?s=some+search+term
```

Verify that the page shows:

```
Search results for: some search term
Tag: competitive programming
```

If it doesn't, then make sure Nginx has this configuration:

```
location / {
  try_files $uri $uri/ /index.php$is_args$query_string;
}
```
