# SimpleTR
A simple plugin for sending messages to players without syntax, for pocketmine.

![icon](icon.png)

## Command

The command is very easy to use.

Usage: `/tellraw {target} (message...)`

Permission: `tellraw.command.use`

### Target Subs

| Code | Description |
|------|-----------|
| `@a` | Everyone in the server |
| `@r` | Random player in the server |
| `@s` | Command sender |

You can use `{player}` for the targets name, `#` for a line break and `&` for colors

You can also send a message to more than 1 player by executing `/tellraw player1,player2 (message...)`
 
