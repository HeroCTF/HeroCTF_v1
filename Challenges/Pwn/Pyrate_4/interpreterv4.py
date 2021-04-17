from sys import modules
modules.clear()
del modules

_raw_input = input
_BaseException = BaseException
_EOFError = EOFError
_print = print
exec = exec
__builtins__.__dict__.clear()
__builtins__ = None

_print('''Et la tu penses pouvoir obtenir ton shell?''')

while 1:
  try:
    d = {'x':None}
    exec('x='+_raw_input()[:50], d)
    _print('Retour:', d['x'])
  except _EOFError as e:
    raise e
  except _BaseException as e:
    _print('Error:', e)