const token = document.head.querySelector('meta[name="internal-access-token"]')

if (token) {
  localStorage.setItem('id_token', token.content)
} else {
  console.error('Access token not found!')
}
