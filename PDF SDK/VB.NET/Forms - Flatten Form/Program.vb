'*******************************************************************
'       ByteScout PDF SDK
'                                                                   
'       Copyright © 2016 Bytescout, http://www.bytescout.com        
'       ALL RIGHTS RESERVED                                         
'                                                                   
'*******************************************************************

Imports Bytescout.PDF

''' <summary>
''' This example demonstrates how to flatten a filled PDF form (make it uneditable).
''' </summary>
Class Program

    Shared Sub Main()

        ' Load filled PDF form
        Dim pdfDocument = New Document("filled_form.pdf")
        pdfDocument.RegistrationName = "demo"
		pdfDocument.RegistrationKey = "demo"

        ' Flatten the form
        pdfDocument.FlattenDocument()

        ' Save modified document
        pdfDocument.Save("result.pdf")

        ' Cleanup 
		pdfDocument.Dispose()

        ' Open document in default PDF viewer app
        Process.Start("result.pdf")

    End Sub

End Class
