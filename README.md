# Premailer Plugin for Craft

Premailer uses the Premailer API (http://premailer.dialect.ca/) to inline the CSS for HTML emails. This is especially useful when using the "template" feature in Craft's email settings.

## Usage

```
{% premailer with {options} %}
    [[ Your Layout Here ]]
{% endpremailer %}
        
```

Don't forget to cache it!! ({% cache %} tag - See Example Below)

## Options

All premailer options are supported, you can view details here: http://premailer.dialect.ca/api. If you want to use the defaults just leave the with clause out.


## Example

```
{% cache %}

    {% premailer with {preserve_styles:false, remove_ids: true, remove_classes: true, remove_comments: true} %}
    {# you can also use: {% premailer %} #}
        <html>
            <head>
                <title>My Email Wrapper</title>
                <style type="text/css">
                    td {
                        font-family:arial,sans-serif;
                        font-size:14px;
                        line-height:20px;
                    }
                    .big-text {
                        font-size:50px; line-height:55px;
                    }
                </style>
            </head>
            <body>
                <table cellspacing="0" cellpadding="0" width="600" align="center">
                    <tr>
                        <td class="big-text">Headline</td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lorem ipsum yo...</p>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
    {% endpremailer %}

{% endcache %}
```