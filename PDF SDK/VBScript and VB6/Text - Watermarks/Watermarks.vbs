'*******************************************************************
'       ByteScout PDF SDK
'                                                                   
'       Copyright © 2016 Bytescout, http://www.bytescout.com        
'       ALL RIGHTS RESERVED                                         
'                                                                   
'*******************************************************************

' This example demonstrates how to change the word spacing.

' Create Bytescout.PDF.Document object
Set pdfDocument = CreateObject("Bytescout.PDF.Document")
pdfDocument.RegistrationName = "demo"
pdfDocument.RegistrationKey = "demo"

Set comHelpers = pdfDocument.ComHelpers

' Add page
Set page1 = comHelpers.CreatePage(comHelpers.PAPERFORMAT_A4)
pdfDocument.Pages.Add(page1)

Set font = comHelpers.CreateSystemFont("Arial", 16)

' Add watermark
Set watermark1 = comHelpers.CreateTextWatermark("Center Watermark")
watermark1.Font = font
watermark1.Left = 240
watermark1.Top = 450
watermark1.Angle = -45
page1.Watermarks.Add(watermark1)

' Add another watermark
Set watermark2 = comHelpers.CreateTextWatermark("Bottom Watermark")
watermark2.Font = font
watermark2.Left = 240
watermark2.Top = 800
page1.Watermarks.Add(watermark2)

' Save document to file
pdfDocument.Save("result.pdf")

' Open document in default PDF viewer app
Set shell = CreateObject("WScript.Shell")
shell.Run "result.pdf", 1, false
