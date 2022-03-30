import http from 'http';
import fs from 'fs';

http.createServer((req, res) => {
  const url = new URL(req.url, `http://${req.headers.host}`);

  if (url.pathname.toLowerCase() === '/') {
    const fileName = './page/index.html'

    fs.readFile(fileName, (err, data) => {
      if (err) throw new Error('File not found.')

      res.setHeader('content-type', 'text/html')
      res.write(data.toString())
      res.end()
    })

    return
  }

  if (url.pathname.toLowerCase() === '/index.html') {
    const fileName = './page/index.html'

    fs.readFile(fileName, (err, data) => {
      if (err) throw new Error('File not found.')

      res.setHeader('content-type', 'text/html')
      res.write(data.toString())
      res.end()
    })

    return
  }

  if (url.pathname.toLowerCase() === '/models.html') {
    const fileName = './page/models.html'

    fs.readFile(fileName, (err, data) => {
      if (err) throw new Error('File not found.')

      res.setHeader('content-type', 'text/html')
      res.write(data.toString())
      res.end()
    })

    return
  }

  if (url.pathname.toLowerCase() === '/about.html') {
    const fileName = './page/about.html'

    fs.readFile(fileName, (err, data) => {
      if (err) throw new Error('File not found.')

      res.setHeader('content-type', 'text/html')
      res.write(data.toString())
      res.end()
    })

    return
  }

  if (url.pathname.toLowerCase() === '/contact.html') {
    const fileName = './page/contact.html'

    fs.readFile(fileName, (err, data) => {
      if (err) throw new Error('File not found.')

      res.setHeader('content-type', 'text/html')
      res.write(data.toString())
      res.end()
    })

    return
  }

  res.writeHead(404, {
    'content-type': 'text/html'
  })
  res.write('Page Not Found')
  res.end()

}).listen(2468)